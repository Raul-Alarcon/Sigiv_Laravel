import BaseService from "./BaseService";

export default class SupplierService extends BaseService {
    constructor() {
        super('api/suppliers');

        this.model = {
            id: 0,
            name: '',
            description: '',
            contact : '',
            phone: '',
            email: '',
            status: true
        }
        this.rules = {
            name: [
                { required: true, message: 'The name is required', trigger: 'blur' },
                { min: 3, message: 'The name must be at least 3 characters long ', trigger: 'blur' },
                { max: 50, message: 'The name must be no longer than 50 characters', trigger: 'blur' }
            ],
            description: [
                { required: true, message: 'The description is required', trigger: 'blur' },
                { min: 3, message: 'The description must be at least 3 characters long ', trigger: 'blur' },
                { max: 50, message: 'The description must be no longer than 50 characters', trigger: 'blur' }
            ],
            contact: [
                { required: true, message: 'The contact is required', trigger: 'blur' },
                { min: 3, message: 'The contact must be at least 3 characters long ', trigger: 'blur' },
                { max: 50, message: 'The contact must be no longer than 50 characters', trigger: 'blur' }
            ],
            phone: [
                { required: true, message: 'The phone is required', trigger: 'blur' },
                { min: 9, message: 'The phone must be at least 9 characters long ', trigger: 'blur' },
                { max: 20, message: 'The phone must be no longer than 20 characters', trigger: 'blur' }
            ],
            email: [
                { required: true, message: 'The email is required', trigger: 'blur' },
                { min: 3, message: 'The email must be at least 3 characters long ', trigger: 'blur' },
                { max: 50, message: 'The email must be no longer than 50 characters', trigger: 'blur' }
            ]
        }
    }
}
