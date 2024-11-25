import BaseService from './BaseService';

export default class CompanyService extends BaseService {
    constructor() {
        super('api/companies');

        this.model = {
            id: 0,
            name: "",
            nrc: "",
            description: "",
            email: "",
            logo: "",
            website: "",
            fundation_date: null,
            status: false,
            sector_id: null,
        }

        this.rules = {
            name: [
                { required: true, message: 'Name is required' }
            ],
            nrc: [
                { required: true, message: 'NRC is required' }
            ],
            description: [
                { required: true, message: 'Description is required' }
            ],
            email: [
                { required: true, message: 'Email is required' }
            ],
            logo: [
                { required: true, message: 'Logo is required' }
            ],
            website: [
                { required: true, message: 'Website is required' }
            ],
            fundation_date: [
                { required: true, message: 'Fundation Date is required' }
            ],
            status: [
                { required: true, message: 'Status is required' }
            ],
            sector_id: [
                { required: true, message: 'Sector is required' }
            ],
        }
    }
}