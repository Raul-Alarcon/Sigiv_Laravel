import BaseService from "./BaseService.js";

export default class ProductService extends BaseService {
    constructor() {
        super('api/products');

            this.model = {
                name: '', 
                description: '',
                unit_price: 0,
                category_id: "",
                barcode: "",
                stock: 0,
                minimun_stock: 3,
                productstatus_id: 1,
                supplier_id: "",
            }

        this.rules = {
            name: [
                { required: true, message: 'The name is required', trigger: 'blur' },
                { min: 3, message: 'The name must be at least 3 characters long', trigger: 'blur' },
                { max: 50, message: 'The name must be no longer than 50 characters', trigger: 'blur' }
            ],
            description: [
                { required: true, message: 'The description is required', trigger: 'blur' },
                { min: 20, message: 'The description must be at least 20 characters long', trigger: 'blur' },
                { max: 255, message: 'The description must be no longer than 255 characters', trigger: 'blur' }
            ],
            unit_price: [
                { required: true, message: 'The unit price is required', trigger: 'blur' },
                { type: 'number', message: 'The unit price must be a number', trigger: 'blur' },
                { min: 0, message: 'The unit price cannot be negative', trigger: 'blur' }
            ],
            category_id: [
                { required: true, message: 'The category is required', trigger: 'change' }
            ],
            barcode: [
                { required: true, message: 'The barcode is required', trigger: 'blur' },
                { min: 8, message: 'The barcode must be at least 8 characters long', trigger: 'blur' },
                { max: 20, message: 'The barcode must be no longer than 20 characters', trigger: 'blur' }
            ],
            stock: [
                { required: true, message: 'The stock is required', trigger: 'blur' },
                { type: 'number', message: 'The stock must be a number', trigger: 'blur' },
                { min: 0, message: 'The stock cannot be negative', trigger: 'blur' }
            ],
            minimun_stock: [
                { required: true, message: 'The minimum stock is required', trigger: 'blur' },
                { type: 'number', message: 'The minimum stock must be a number', trigger: 'blur' },
                { min: 1, message: 'The minimum stock must be at least 1', trigger: 'blur' }
            ],
            productstatus_id: [
                { required: true, message: 'The product status is required', trigger: 'change' }
            ],
            supplier_id: [
                { required: true, message: 'The supplier is required', trigger: 'change' }
            ]
        };
        
    }

    async getCategories() { 
        let responce = await axios.get(`${this.urlApi}/categories`);
        if (responce.status != 200) throw new Error('Error loading data');
        return responce.data;
    }
    
    async getSuppliers() { 
        let responce = await axios.get(`${this.urlApi}/suppliers`);
        if (responce.status != 200) throw new Error('Error loading data');
        return responce.data;
    }
    
}