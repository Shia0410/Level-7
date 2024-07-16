<template>
    <v-container>
      <v-btn color="primary" @click="showForm = true">Add Item</v-btn>
      <ItemForm v-if="showForm" @close="showForm = false" @save="fetchItems" />
      <v-list>
        <v-list-item v-for="item in items" :key="item.id">
          <v-list-item-content>
            <v-list-item-title>{{ item.name }}</v-list-item-title>
            <v-list-item-subtitle>{{ item.description }}</v-list-item-subtitle>
          </v-list-item-content>
          <v-list-item-action>
            <v-btn @click="editItem(item)">Edit</v-btn>
            <v-btn @click="deleteItem(item.id)">Delete</v-btn>
          </v-list-item-action>
        </v-list-item>
      </v-list>
    </v-container>
  </template>
  
  <script>
  import axios from 'axios';
  import ItemForm from './ItemForm.vue';
  
  export default {
    components: { ItemForm },
    data() {
      return {
        items: [],
        showForm: false,
      };
    },
    methods: {
      fetchItems() {
        axios.get('/api/items').then(response => {
          this.items = response.data;
        });
      },
      editItem(item) {
        //TODO
      },
      deleteItem(id) {
        axios.delete(`/api/items/${id}`).then(() => {
          this.fetchItems();
        });
      }
    },
    mounted() {
      this.fetchItems();
    }
  };
  </script>
  