import React from "react";
import { Form, Button, Spinner, Alert, InputGroup } from "react-bootstrap";
import errorService from "./../../services/error.service";

export default function (props) {
    const { artist = "" } = props.data;
    const { artist: artistErr = null } = errorService.getFieldsErrors(
        props.error
    );

    return (
        <Form
            noValidate
            onSubmit={props.handleSubmit}
            className="albums-search-form"
        >
            {errorService.getErrorMessage(props.error) && (
                <Alert variant="danger">
                    {errorService.getErrorMessage(props.error)}
                </Alert>
            )}

            <InputGroup>
                <Form.Control
                    type="text"
                    placeholder="Ingrese el nombre del artista"
                    name="artist"
                    value={artist}
                    onChange={props.handleChange}
                    isInvalid={!!artistErr}
                />

                <Button
                    variant="primary"
                    type="submit"
                    disabled={props.pending}
                >
                    {props.pending ? (
                        <>
                            Buscando...
                            <Spinner
                                animation="border"
                                role="status"
                                aria-hidden="true"
                                size="sm"
                                className="ms-2"
                            />
                        </>
                    ) : (
                        "Buscar"
                    )}
                </Button>

                {artistErr && (
                    <Form.Control.Feedback type="invalid">
                        {artistErr}
                    </Form.Control.Feedback>
                )}
            </InputGroup>
        </Form>
    );
}
