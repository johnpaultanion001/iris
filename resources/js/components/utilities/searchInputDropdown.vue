<template>
  <div class="relative text-left">
    <div>
      <div class="mt-1 relative rounded-md shadow-sm text-sm">
        <input :id="id"
               :class="disabled ? 'bg-gray-100 text-gray-500' : ''"
               :disabled="disabled"
               :placeholder="placeholder"
               :required="required"
               :value="modelValue"
               autocomplete="off"
               class="mt-2 w-full secondary-input"
               type="text"
               @focus="toggleDropdown()"
               @input="filterData($event.target.value)"
               @keyup="keyup($event)">
      </div>
      <span class="absolute inset-y-0 right-0 flex items-center pr-2 top-2">
             <svg v-if="!showClearButton && !search" fill="none"
                  height="8" viewBox="0 0 13 8" width="13" xmlns="http://www.w3.org/2000/svg">
               <path d="M1 1L6.5 7L12 1" stroke="#172B4D" stroke-linecap="round" stroke-linejoin="round"
                     stroke-width="2"/>
             </svg>
         <svg v-else @click="clearInput" width="14" height="15"
              viewBox="0 0 14 15" fill="none"
              xmlns="http://www.w3.org/2000/svg" class="cursor-pointer">
                        <path d="M1 13.5L13 1.5M1 1.5L13 13.5" stroke="#111827" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>

            </span>
    </div>
    <div :ref="'dropDown'">
      <transition enter-active-class="transition ease-out duration-100"
                  enter-class="transform opacity-0 scale-95"
                  enter-to-class="transform opacity-100 scale-100"
                  leave-active-class="transition ease-in duration-75"
                  leave-class="transform opacity-100 scale-100"
                  leave-to-class="transform opacity-0 scale-95">
      </transition>
      <div v-if="dropdownOpen"
           class="origin-top-right absolute left-0 mt-2 w-full max-h-44 overflow-y-auto rounded-sm shadow-lg z-10">
        <div :aria-labelledby="id" aria-orientation="vertical"
             class="rounded-sm bg-white shadow-xs"
             role="menu">
          <div class="px-2 py-1">
            <div v-if="searching && modelValue !== null">
              <div v-if="filteredData.length === 0 && searching && freeText === false">
                <a
                  class="group flex items-center px-2 py-2 text-sm leading-5 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900"
                  role="menuitem">
                  Sorry, we couldn't find any results
                </a>
              </div>
              <div v-for="(result, index) in filteredData" :key="index">
                <div
                  :class="filteredData.length > 1 && index !== filteredData.length - 1? 'border-b border-gray-200': ''"
                  class="py-1" @click="selectedOption(index)">
                  <a :key="index"
                     class="group flex items-center font-inter-400 px-2 py-2 text-sm"
                     role="menuitem">
                     <p v-html="searchResult(result.product_service)"></p>
                  </a>
                </div>
              </div>
            </div>
            <div v-else>
              <div v-for="(data, index) in dataList" :key="index">
                <div
                  :class="dataList.length > 1 && index !== dataList.length - 1? 'border-b border-gray-200': ''"
                  class="py-1">
                  <a :key="index"
                     class="group flex items-center px-2 py-2 text-sm leading-5 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900"
                     role="menuitem"
                     @click="selectedOption(index)">
                    {{ data.product_service }}
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  name: "SearchInputDropdown",
  props: {
    id: {
      type: String,
      default() {
        return `search-input-dropdown-1`
      },
    },
    label: {type: String, default: ''},
    dataList: Array,
    modelValue: String,
    type: {type: String, default: ''},
    required: Boolean,
    search: {type: Boolean, default: false},
    disabled: {type: Boolean, default: false},
    freeText: {type: Boolean, default: false, required: false},
    placeholder: {type: String, default: ''}
  },
  emits: ['update:modelValue', 'filter-data', 'update-value', 'clear-input'],

  data() {
    return {
      dropdownOpen: false,
      filteredData: [],
      showClearButton: false,
      filtered: false,
      searching: false,
      selectedValue: null
    }
  },
  methods: {
    toggleDropdown() {
      this.dropdownOpen = !this.dropdownOpen
    },
    away() {
      this.dropdownOpen = false
    },
    keyup() {
      if (this.modelValue) {
        if (this.modelValue.length > 0) {
          this.searching = true
        }
      }
    },
    filterData(value) {
      this.$emit('update:modelValue', value)
      this.dropdownOpen = true
      let searchInput = value.toLowerCase()
      this.filteredData = this.dataList.filter(data => {
        return data.product_service.toLowerCase().includes(searchInput)
      })
      this.$emit('filter-data', this.filteredData);
    },
    searchResult(string) {
      if(this.modelValue !== '' || this.modelValue > 0) {
        let search_word = this.modelValue
        let highlight_text = string.split(" ").filter(function (word) {
          return word !== search_word
        })
        return string.replace(highlight_text.toString(), `<span class='font-inter-700'>${highlight_text.toString()}</span>`);
      }
      return string
    },
    selectedOption(index) {
      this.showClearButton = true
      if (this.searching && this.value !== null) {
        this.selectedValue = this.filteredData[index]
      } else {
        this.selectedValue = this.dataList[index]
      }
      this.$emit('update-value', this.selectedValue)
      this.searching = false
      this.dropdownOpen = false
    },
    clearInput() {
      this.$emit('clear-input')
      this.showClearButton = false
    },
  }
}
</script>
