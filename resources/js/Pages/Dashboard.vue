<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
import NewDomainForm from '@/Layouts/NewDomainForm.vue';
</script>

<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <NewDomainForm>

        </NewDomainForm>
    </BreezeAuthenticatedLayout>
</template>
