
export default function DateFormat(dataString) { 
    const date = new Date(dataString); 
    const formattedDate = date.toLocaleDateString("es-ES", {
        day: "2-digit",
        month: "2-digit",
        year: "numeric",
        // hour: "2-digit",
        // minute: "2-digit",
        // second: "2-digit",
        // timeZoneName: "short"
    });
    return formattedDate;
}
