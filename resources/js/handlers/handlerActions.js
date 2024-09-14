import { ElMessage } from "element-plus";

export const opElMessage = {
    type: "error",
    message: "",
    showClose: true,
}



export default async function handlerActions(action) { // action is a function
    try {
        await action();
        opElMessage.type = "success";
        opElMessage.message = "Action completed successfully";
    } catch (error) {
        opElMessage.message = error.message;
    }

    ElMessage(opElMessage); 
}