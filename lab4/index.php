<!DOCTYPE html>
<html lang="utf-8">
<head>
 <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    <title>WEB-систем</title>
</head>
<body>
<div id="app">
    <v-app>
        <v-app-bar color="primary" dense dark app>
            <v-toolbar-title>WEB-системи</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-text-field v-model="search" class="mx-4" flat hide-details label="Пошук" prepend-inner-icon="search"
                          solo-inverted></v-text-field>
        </v-app-bar>
        <v-content>
            <v-container>
                <v-list>
                    <template v-for="(item, i) in list">
                        <v-list-item :key="i" >
                            <v-list-item-avatar>
                                <v-img :src="item.logo"></v-img>
                            </v-list-item-avatar>
                            <v-list-item-content>
                                <v-list-item-title >{{item.name}}</v-list-item-title>
                                <v-list-item-subtitle >{{item.brandName}}</v-list-item-subtitle>
                            </v-list-item-content>
                            <v-list-item-icon >
                                <v-icon @click="remove(item.id)">delete</v-icon>
                            </v-list-item-icon>
                        </v-list-item>
                        <v-divider :key="`${i}-divider`"></v-divider>
                    </template>
                </v-list>
            </v-container>
        </v-content>

        <v-btn color="primary" dark fixed bottom right fab @click="openDialog">
            <v-icon>mdi-plus</v-icon>
        </v-btn>

        <v-dialog v-model="dialog" width="500" persistent>
            <v-card>
                <v-tabs color="primary" v-model="tab" grow>
                    <v-tab>Маркa</v-tab>
                    <v-tab>Машини</v-tab>
                </v-tabs>
                <v-divider></v-divider>

                <v-card-text>
                    <v-form :value="true">
                        <v-row aling="end">
                            <v-col cols="6">
                                <v-img :src="model[tab].logo" height="150" cover></v-img>
                                <v-text-field label="Logo" v-model="model[tab].logo"
                                              placeholder="Посилання на картинку"></v-text-field>
                            </v-col>
                            <v-col cols="6" aling-self="end">
                                <template v-if="tab">
                                    <v-select v-model="model[tab].brand_id" :items="brands" item-text="name" item-value="id"
                                              filled label="Марка"
                                    ></v-select>
                                </template>
                                <v-text-field label="Назва" v-model="model[tab].name">

                                </v-text-field>
                            </v-col>
                        </v-row>
                    </v-form>
                </v-card-text>

                <v-divider></v-divider>
                <v-card-actions>
                    <v-btn text @click="dialog = false"> Скасувати</v-btn>
                    <v-spacer></v-spacer>
                    <v-btn color="primary" @click="addNew" :loading="processing">Зберегти</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>

    </v-app>
</div>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
<script src="js/main.js"></script>
</body>