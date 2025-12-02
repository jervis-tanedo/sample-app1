import { defineStore } from 'pinia';
import { ref } from 'vue';
import type { UserList } from '@/types';


export const useUserStore = defineStore('user', () => {
    const users = ref<UserList[]>([]);
    const pagination = ref({});

    function setUsers(payload: UserList[]) {
    users.value = payload;
}
    console.log(users);
    return { users, setUsers };
});