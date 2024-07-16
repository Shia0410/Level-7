<template>
    <v-dialog v-model="show">
      <v-card>
        <v-card-title>{{ item.id ? 'Edit' : 'Add' }} Item</v-card-title>
        <v-card-text>
          <v-form ref="form" v-model="valid">
            <v-text-field v-model="item.name" label="Name" required></v-text-field>
            <v-textarea v-model="item.description" label="Description" required></v-textarea>
          </v-form>
        </v-card-text>
        <v-card-actions>
          <v-btn color="primary" @click="saveItem">Save</v-btn>
          <v-btn @click="$emit('close')">Cancel</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    props: ['item'],
    data() {
      return {
        show: true,
        valid: true,
      };
    },
    methods: {
      saveItem() {
        const url = this.item.id ? `/api/items/${this.item.id}` : '/api/items';
        const method = this.item.id ? 'put' : 'post';
        axios[method](url, this.item).then(() => {
          this.$emit('save');
          this.$emit('close');
        });
      }
    }
  };
  </script>
  