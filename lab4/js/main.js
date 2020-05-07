let vm = new Vue({
    el: '#app',
    vuetify: new Vuetify({
        icons: {
            iconfont: 'mdi', // default - only for display purposes
        },
    }),
    data: () => ({
        dialog: false,
        search: '',
        brands: [],
        tab: 0,
        model: {
            0: {},
            1: {}
        },
        processing: false,
        item: [],
    }),
    computed: {
        list() {
            return this.item.filter(item => {
                return item.name.toLowerCase()
                    .match(this.search.toLowerCase())
            })
        }
    },
    mounted() {
        this.fetch();
    },
    methods: {
        async fetch() {
            const res = await fetch('car.php', {
                        method: 'get'});
            this.item = await res.json();
        },
        /**
         *
         * @returns {Promise<void>}
         */
        async addNew() {
            this.processing = true;
            try {
                if (!this.tab) {
                    await fetch('brand.php', {
                        method: 'post',
                        body: JSON.stringify(this.model[this.tab])
                    })
                } else {
                    await fetch('car.php', {
                        method: 'post',
                        body: JSON.stringify(this.model[this.tab])
                    })
                }
            } catch (e) {
            	
            }

            this.fetch();
            this.dialog = false;
            this.processing = false;
        },
        async openDialog() {
            const res = await fetch('brand.php');
            this.brands = await res.json();
            this.model = {
                0: {},
                1: {}
            };
            this.dialog = true
        },
        async remove(id){
            await fetch('car.php', {
                method: 'delete',
                body: JSON.stringify({id})
            });
            this.fetch();
        }
    },
});