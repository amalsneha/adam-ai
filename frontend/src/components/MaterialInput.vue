<template>
  <div class="input-group" :class="`input-group-${variant} ${getStatus(error, success)}`">
    <label :class="[variant === 'static' ? '' : 'form-label', color === 'dark' ? 'text-black' : 'text-white']">
      {{ label }}
    </label>
    <input 
      :id="id" 
      :type="type" 
      class="form-control" 
      :class="getClasses(size, color)" 
      :name="name" 
      :placeholder="placeholder" 
      :required="isRequired" 
      :disabled="disabled"
      v-model="inputValue"  
      @input="updateValue"  
    />
  </div>
</template>

<script>
import setMaterialInput from "@/assets/js/material-input.js";

export default {
  name: "MaterialInputField",
  props: {
    variant: {
      type: String,
      default: "outline",
    },
    label: {
      type: String,
      default: "",
    },
    size: {
      type: String,
      default: "default",
    },
    success: {
      type: Boolean,
      default: false,
    },
    error: {
      type: Boolean,
      default: false,
    },
    disabled: {
      type: Boolean,
      default: false,
    },
    name: {
      type: String,
      default: "",
    },
    id: {
      type: String,
      required: true,
    },
    modelValue: { // Ensure modelValue is declared
      type: String,
      default: "",
    },
    placeholder: {
      type: String,
      default: "",
    },
    type: {
      type: String,
      default: "text",
    },
    isRequired: {
      type: Boolean,
      default: false,
    },
    color: {
      type: String,
      default: "dark",
    },
  },

  emits: ['update:modelValue'],
  
  data() {
    return {
      inputValue: this.modelValue, // Initialize from modelValue
    };
  },

  watch: {
    modelValue(newValue) {
      this.inputValue = newValue; // Sync with external changes
    }
  },

  methods: {
    updateValue() {
      this.$emit('update:modelValue', this.inputValue); // Emit change
    },
    getClasses(size) {
      return size ? `form-control-${size}` : null;
    },
    getStatus(error, success) {
      if (success) return "is-valid";
      if (error) return "is-invalid";
      return null;
    },
  },

  mounted() {
    setMaterialInput();
  },
};
</script>
