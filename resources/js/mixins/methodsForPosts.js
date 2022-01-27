export const methodsForPosts = {
    methods: {
        //сделать имя файла (alt) для картинок
        altImg(file_name) {
            let name = file_name
            let lastSlesh = name.lastIndexOf('/');
            let res = name.slice(lastSlesh+1);
            return res;
        },
        //обрезание контента до 300 символов
        shortContent(content) {
            let maxSymbol = 300
            if (content.length > maxSymbol) {
                return content.slice(0, maxSymbol+1)
            } else {
                return content
            }
        },
    }
}
