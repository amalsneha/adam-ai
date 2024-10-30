/* eslint-disable no-unused-vars */
import usersService from '../services/users.service';

const initialState = { users: null, user: null};

export const users = {
    namespaced: true,
    state: initialState,
    actions: {
        

        async addUsers({ commit }, newItem) {
            const item =  await usersService.addUsers(newItem);
            commit('getItemSuccess', item);
        },

        async updateUser({ commit }, newItem) {
            const item =  await usersService.updateUser(newItem);
            commit('getItemSuccess', item);
        },


    },
    mutations: {
        getItemsSuccess(state, items) {
            state.items = items;
        },
        getItemSuccess(state, item) {
            state.item = item;
        },
        
    },
   
}

