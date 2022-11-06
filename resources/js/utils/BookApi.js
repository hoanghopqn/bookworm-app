import request from "./request";

const BookApi = {
    async getAll(endpoint,options) {
        const response = await request.get(endpoint,options)
        return response.data;
    }, 

}

export default BookApi