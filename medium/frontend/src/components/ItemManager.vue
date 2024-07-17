<template>
  <v-container>
    <v-data-table
      :headers="headers"
      :items="items"
      class="elevation-1"
    >
      <template v-slot:top>
        <v-toolbar flat>
          <v-toolbar-title>Items</v-toolbar-title>
          <v-divider class="mx-4" inset vertical></v-divider>
          <v-spacer></v-spacer>
          <v-dialog v-model="dialog" max-width="500px">
            <template v-slot:activator="{ props }">
              <v-btn color="primary" dark class="mb-2" v-bind="props">
                New Item
              </v-btn>
            </template>
            <v-card>
              <v-card-title>
                <span class="text-h5">{{ formTitle }}</span>
              </v-card-title>
              <v-card-text>
                <v-container>
                  <v-row>
                    <v-col cols="12">
                      <v-text-field v-model="editedItem.name" label="Name"></v-text-field>
                    </v-col>
                    <v-col cols="12">
                      <v-textarea v-model="editedItem.description" label="Description"></v-textarea>
                    </v-col>
                  </v-row>
                </v-container>
              </v-card-text>
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue-darken-1" variant="text" @click="close">Cancel</v-btn>
                <v-btn color="blue-darken-1" variant="text" @click="save">Save</v-btn>
              </v-card-actions>
            </v-card>
          </v-dialog>
        </v-toolbar>
      </template>
      <template v-slot:item.actions="{ item }">
        <v-icon size="small" class="me-2" @click="editItem(item)">mdi-pencil</v-icon>
        <v-icon size="small" @click="deleteItem(item)">mdi-delete</v-icon>
      </template>
    </v-data-table>
  </v-container>
</template>

<script lang="ts">
import { defineComponent, ref, computed, onMounted } from 'vue'
import axios from 'axios'

interface Item {
  id?: number;
  name: string;
  description: string;
}

export default defineComponent({
  setup() {
    const api_url = 'http://localhost:8000/api/items/'
    const dialog = ref(false)
    const items = ref<Item[]>([])
    const editedIndex = ref(-1)
    const editedItem = ref<Item>({
      name: '',
      description: '',
    })
    const defaultItem: Item = {
      name: '',
      description: '',
    }

    const headers = [
      { title: 'Name', key: 'name' },
      { title: 'Description', key: 'description' },
      { title: 'Actions', key: 'actions', sortable: false },
    ]

    const formTitle = computed(() => {
      return editedIndex.value === -1 ? 'New Item' : 'Edit Item'
    })

    async function initialize() {
      const response = await axios.get<Item[]>(api_url)
      items.value = response.data
    }

    function editItem(item: Item) {
      editedIndex.value = items.value.indexOf(item)
      editedItem.value = Object.assign({}, item)
      dialog.value = true
    }

    async function deleteItem(item: Item) {
      const index = items.value.indexOf(item)
      if (confirm('Are you sure you want to delete this item?')) {
        await axios.delete(api_url+item.id)
        items.value.splice(index, 1)
      }
    }

    function close() {
      dialog.value = false
      editedItem.value = Object.assign({}, defaultItem)
      editedIndex.value = -1
    }

    async function save() {
      if (editedIndex.value > -1) {
        await axios.put(api_url+editedItem.value.id, editedItem.value)
        Object.assign(items.value[editedIndex.value], editedItem.value)
      } else {
        const response = await axios.post<Item>(api_url, editedItem.value)
        items.value.push(response.data)
      }
      close()
    }

    onMounted(initialize)

    return {
      dialog,
      headers,
      items,
      editedIndex,
      editedItem,
      formTitle,
      close,
      save,
      editItem,
      deleteItem,
    }
  },
})
</script>