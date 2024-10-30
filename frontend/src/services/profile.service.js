import axios from 'axios';
import authHeader from './auth-header';


const API_URL = process.env.VUE_APP_API_BASE_URL;


export default {
  async getProfile() {
    
    const response = await axios.get(API_URL + "/me", { headers: authHeader() })
   
    return (response.data);
  },

  async editProfile(profileData) {
   
    profileData.type = 'profile'
   
    //console.log("Serialized Profile Data:", profileData);

    const response = await axios.patch(API_URL + "/me", profileData, { headers: authHeader() })
    return (response.data);
  },

  async uploadPic(pic, userId) {
    const postUrl = API_URL + "/uploads/users/" + userId + "/profile-image";
    const response = await axios.post(postUrl,
      { attachment: pic },
      { headers: { 'Content-Type': 'multipart/form-data' } }
    );
    return response.data;
  }

}