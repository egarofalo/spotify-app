export default {
    getError(error) {
        if (_.has(error, "response")) {
            return {
                status: error.response.status,
                statusText: error.response.statusText,
                data: _.has(error.response, "data")
                    ? error.response.data
                    : null,
            };
        }

        return error;
    },
    getFieldError(error, field) {
        return _.get(error, "status") === 422 ? error.data[field] : null;
    },
    getFieldsErrors(error) {
        return _.get(error, "status") === 422 ? error.data : [];
    },
    getErrorMessage(error) {
        if (_.has(error, "data.message")) {
            return error.data.message;
        }

        if (_.has(error, "data.error.message")) {
            return error.data.error.message;
        }

        if (_.has(error, "statusText")) {
            return error.statusText;
        }

        return error;
    },
    removeFieldError(error, field) {
        if (_.get(error, "status") === 422) {
            return _.omit(error, `data.errors.${field}`);
        }

        return error;
    },
};
