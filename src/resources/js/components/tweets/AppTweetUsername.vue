<template>
    <a class="text-gray-300 font-bold cursor-pointer">
        {{ user.name }}
        <span class="text-gray-600 font-normal"> @{{ user.username }} </span>
    </a>
</template>

<script>
export default {
    props: {
        user: {
            required: true,
            type: Object,
        },
    },
};
</script>
