import axios from 'axios';
import authHeader from './auth-header';
const API_URL = process.env.VUE_APP_API_BASE_URL;


export default {
    

    async addUsers(user) {

        user.type = "users"
        const response = await axios.post(API_URL + "/user", user, { headers: authHeader() });
        return (response.data);
    },

    async getUsers() {
        const response = await axios.get(API_URL + "/user", { headers: authHeader()});
        return (response.data);
    },

    async deleteUser(userId) {
        await axios.delete(API_URL + "/user/" + userId, { headers: authHeader() });
    },
    
    async getUserById(userId) {
        const response = await axios.get(API_URL + "/user/" + userId , { headers: authHeader() });
        return (response.data);
    },
    
    async updateUser(user) {
       
        const response = await axios.patch(API_URL + "/user/" + user.id, user, { headers: authHeader() });
        return (response.data);
    },
    

   
}




