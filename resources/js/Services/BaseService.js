import axios from 'axios'

export default class BaseService {

    constructor(urlApi) {
        this.model = {}
        this.rules = {}
        this.urlApi = urlApi
        this.opcElMessage = {
            showClose: true,
            message: 'Successfully',
            type: 'success'
        }
        this.axios = axios
    }

    async getAll(paginate = 10) {
        let responce = await axios.get(`${this.urlApi}?paginate=${paginate}`);
        if (responce.status != 200) throw new Error('Error loading data');
        return responce.data;
    }

    async search(query) {
        let responce = await axios.get(`${this.urlApi}?search=${query}`,);
        if (responce.status != 200) throw new Error('Error loading data');
        return responce.data;
    }

    async delete(id) {
        let responce = await axios.delete(`${this.urlApi}/${id}`);
        if (responce.status != 204) throw new Error('Error deleting data');
        return responce.data;
    }

    async update (id, data) {
        console.log(`${this.urlApi}/${id}`)
        let responce = await axios.put(`${this.urlApi}/${id}`, data);
        if (responce.status != 200) throw new Error('Error updating data');
        return responce.data;
    }

    async create(data) {
        let responce = await axios.post(`${this.urlApi}`, data);
        if (responce.status != 201) throw new Error('Error creating data');
        return responce.data;
    }

    async updateStatus(id) {
        let responce = await axios.patch(`${this.urlApi}/${id}`);
        if (responce.status != 204) throw new Error('Error updating status');

    }
}
