import BaseService from './BaseService';
export default class SocialMediaService extends BaseService {
    constructor() {
        super ('api/socialmedia');
        this.model = {
            id: 0,
            name: '',
            logo: '',
        }
        this.rules = {
            name: [
                { required: true, message: 'The name is required', trigger: 'blur' },
                { min: 3, message: 'The name must be at least 3 characters long ', trigger: 'blur' },
                { max: 50, message: 'The name must be no longer than 50 characters', trigger: 'blur' }
            ],
            logo: [
                { required: true, message: 'The logo is required', trigger: 'blur' },
                { min: 3, message: 'The logo must be at least 3 characters long ', trigger: 'blur' },
                { max: 50, message: 'The logo must be no longer than 50 characters', trigger: 'blur' }
            ]
        }
    }
}
