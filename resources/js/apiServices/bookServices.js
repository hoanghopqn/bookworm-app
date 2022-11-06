import * as request from "../utils/request";

export const getListBooks = async (endpoint, options) => {
    try {
        const res = await request.get(endpoint, options);
        return res;
    } catch (error) {
        console.log(error);
    }
};
