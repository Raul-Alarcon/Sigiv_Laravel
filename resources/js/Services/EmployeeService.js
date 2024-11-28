import BaseService from "./BaseService";

export default class EmployeeService extends BaseService {
    constructor() {
        super("api/employees");

        this.model = {
            id: 0,
            code: '',
            DUI: '',
            names: '',
            last_names: '',
            age: '',
            hiring_date: '',
            termination_date: null,
            storebranch_id: null,
            charge_id: null,
            gender_id: null
        }

        this.rules = {
            code: [
                { required: true, message: "The code is required.", trigger: "blur" },
                { max: 50, message: "The code must not exceed 50 characters.", trigger: "blur" }
            ],
            DUI: [
                { required: true, message: "The DUI is required.", trigger: "blur" },
                { pattern: /^\d{8}-\d$/, message: "The DUI format must be 12345678-9.", trigger: "blur" }
            ],
            names: [
                { required: true, message: "The names are required.", trigger: "blur" },
                { max: 100, message: "The names must not exceed 100 characters.", trigger: "blur" }
            ],
            last_names: [
                { required: true, message: "The last names are required.", trigger: "blur" },
                { max: 100, message: "The last names must not exceed 100 characters.", trigger: "blur" }
            ],
            age: [
                { required: true, message: "The birth date is required.", trigger: "blur" },
                { 
                    validator: (rule, value, callback) => {
                        if (!value) {
                            callback(new Error("The birth date is required."));
                        } else {
                            const birthDate = new Date(value);
                            const today = new Date();
                            const age = today.getFullYear() - birthDate.getFullYear();
                            const monthDiff = today.getMonth() - birthDate.getMonth();
                            const dayDiff = today.getDate() - birthDate.getDate();
                             
                            if (monthDiff < 0 || (monthDiff === 0 && dayDiff < 0)) {
                                age--;
                            }
        
                            if (age < 18 || age > 100) {
                                callback(new Error("The person must be between 18 and 100 years old."));
                            } else {
                                callback();
                            }
                        }
                    },
                    trigger: "blur"
                }
            ],
            hiring_date: [
                { required: true, message: "The hiring date is required.", trigger: "blur" },
                { type: "date", message: "The hiring date must be valid.", trigger: "blur" }
            ],
            termination_date: [
                { type: "date", message: "The termination date must be valid.", trigger: "blur" }
            ],
            storebranch_id: [
                { required: true, message: "The store branch is required.", trigger: "change" }
            ],
            charge_id: [
                { required: true, message: "The charge is required.", trigger: "change" }
            ],
            gender_id: [
                { required: true, message: "The gender is required.", trigger: "change" }
            ]
        }

    }

    async getGenders() {
        let responce = await axios.get(`${this.urlApi}/gender`);
        if (responce.status != 200) throw new Error('Error loading data');
        return responce.data;
    }

    async getCharges() {
        let responce = await axios.get(`${this.urlApi}/charge`);
        if (responce.status != 200) throw new Error('Error loading data');
        return responce.data;
    }

    async getStoreBranches() {
        let responce = await axios.get(`${this.urlApi}/storebranch`);
        if (responce.status != 200) throw new Error('Error loading data');
        return responce.data;
    }
}