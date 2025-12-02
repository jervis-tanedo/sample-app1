<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, Link, usePage, router } from '@inertiajs/vue3';
import type {  BreadcrumbItem, UsersPageProps } from '@/types';
import { useUserStore } from '@/stores/userlistStore';

const breadcrumbItems: BreadcrumbItem[] = [
    { title: 'Dashboard', href: '/' },
    { title: 'Users', href: '/user' },
];

const store = useUserStore();

const page = usePage<UsersPageProps>();

store.setUsers(page.props.users);

</script>

<template>
  <AppLayout :breadcrumbs="breadcrumbItems">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        User List
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <!-- User list content goes here -->
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="text-black">ID</th>
                        <th class="text-black">Name</th>
                        <th class="text-black">Email</th>
                        <th class="text-black">Created at</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in store.users" :key="user.id">
                        <td class="text-black">{{ user.id }}</td>
                        <td class="text-black">{{ user.name }}</td>
                        <td class="text-black">{{ user.email }}</td>
                        <td class="text-black">{{ user.created_at }}</td>
                    </tr>
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
  </template>

  