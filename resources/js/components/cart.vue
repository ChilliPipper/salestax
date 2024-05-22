<template>
    
</template>

<script>
export default {
    props: ['cart', 'receipt'],
    methods: {
        addToCart(productId) {
            this.$emit('add-to-cart', productId);
        },
        removeFromCart(productId) {
            this.$emit('remove-from-cart', productId);
        },
        toggleImportDuty(event) {
            this.$emit('toggle-import-duty', event);
        },
        generateReceipt() {
            this.$emit('generate-receipt');
        }
    }
}
</script>