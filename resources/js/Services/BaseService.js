import axios from 'axios'

export default class BaseService {
 
    constructor(urlApi) { 
        this.model = {}
        this.rules = {}
        this.urlApi = urlApi   
    } 

    async getAll(paginate = 10){ 
        let responce = await axios.get(`${this.urlApi}?paginate=${paginate}`);
        if (responce.status != 200) throw new Error('Error loading data');
        return responce.data;
    }
}