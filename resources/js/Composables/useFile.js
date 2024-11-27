import FileService from "@/Services/FileService";

export default function useFile(uploadRef){

    const fileService = new FileService();

    const onBeforeUpload = (rawFile) => {
        const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
        if (!validTypes.includes(rawFile.type)) {
            ElMessage.error('El archivo debe ser una imagen en formato JPG, PNG, o GIF.');
            return false;
        }
    
        if (rawFile.size > 512 * 1024) { // 512 KB
            ElMessage.error('El tamaño del archivo no debe superar los 512 KB.');
            return false;
        }
    
        return true; // Archivo válido
    };

    const onRemove = async (url) => {
        try { 
            if (url != '') { 
                await fileService.destroyoImg(url);
            }
        } catch (error) {
            ElMessage.error('No se pudo eliminar la imagen.');
        } 
    }

    return {
        onBeforeUpload,
        onRemove, 
        fileService
    } 
}