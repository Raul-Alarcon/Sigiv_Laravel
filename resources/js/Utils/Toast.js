import { useToast } from 'primevue/usetoast';
 
const getInstance = (toasInstance) => {
    const Life = 3000;
    const Toast = {}

    Toast.success = (message, title = 'Success') => {
        toasInstance.add({ severity: 'success', summary: title, detail: message, life: Life });
    }
    
    Toast.error = (message, title = 'Error') => {
        toasInstance.add({ severity: 'error', summary: title, detail: message, life: Life });
    }
    
    Toast.warn = (message, title = 'Warning') => {
        toasInstance.add({ severity: 'warn', summary: title, detail: message, life: Life });
    }
    
    Toast.info = (message, title = 'Info') => {
        toasInstance.add({ severity: 'info', summary: title, detail: message, life: Life });
    }
    
    Toast.secundary = (message, title = 'Secondary') => {
        toasInstance.add({ severity: 'secondary', summary: title, detail: message, life: Life });
    }
    
    Toast.primary = (message, title = 'Contrast') => {
        toasInstance.add({ severity: 'contrast', summary: title, detail: message, life: Life });
    }

    return Toast;
}
 

export { getInstance };