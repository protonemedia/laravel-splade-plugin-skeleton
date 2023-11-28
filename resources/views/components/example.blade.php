<script setup>
    const message = ref('Hello World')
</script>

<div class="p-2 space-y-4">
    <h1 class="text-2xl font-bold">Example Component</h1>
    <input type="name" v-model="message" class="border border-black p-2" />

    <p>
        The message is:
        <span v-text="message" />
    </p>
</div>
