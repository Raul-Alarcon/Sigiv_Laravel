import axios from "axios";

export default class FileService {

    async destroyoImg (ulrIm){
        try {
            const response = await axios.delete(`api/upload/`, {
                data: {
                    url: ulrIm
                }
            });
            return response.data;
        } catch (error) {
            return error.response.data;
        }
    }
}