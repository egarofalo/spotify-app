export default {
    async get(data = {}) {
        const response = await axios.get("/api/albums", {
            params: data,
        });

        return response.data;
    },
};
