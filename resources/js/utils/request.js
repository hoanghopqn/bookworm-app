 import axios from "axios";
const request =axios.create({
       baseURL:'http://127.0.0.1:8000/api/',
});
 

export const get = async (endpoint, options = {}) => {
    const response = await request.get(endpoint, options);
    return response.data;
};
export default request;