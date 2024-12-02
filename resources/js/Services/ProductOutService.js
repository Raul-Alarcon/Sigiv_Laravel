import BaseService from "./BaseService";

export default class ProductOutService extends BaseService{
    constructor(){
        super('api/product-out')

        this.model = {
            id: 0,
            date_request:'',
            date_out:'',
            description:'',
            product_id:'',
            user_id:'',
            user_auth_id:'',
            status_id:'',
        }

        this.rules = {
            description: [
                { required: true, message: 'The description is required', trigger: 'blur' },
                { min: 20, message: 'The description must be at least 20 characters long', trigger: 'blur' },
                { max: 255, message: 'The description must be no longer than 255 characters', trigger: 'blur' }
            ], 
            product_id: [
                { required: true, message: 'The product is required', trigger: 'change' }
            ],
        }
    }

    async getProducts(){
        let responce = await axios.get(`${this.urlApi}/products`);
        if (responce.status != 200) throw new Error('Error loading data');
        return responce.data;
    }
}