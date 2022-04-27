import React from "react";
import { Card, Container } from "react-bootstrap";

export default function () {
    return (
        <Container fluid="xl">
            <Card className="text-center">
                <p className="m-0 p-4 pb-2 fs-4">THIS IS THE HOME PAGE APP</p>

                <p className="m-0 pb-4 fs-5">
                    You must click <a href="/login">here</a> to authenticate
                    with Sopotify API
                </p>
            </Card>
        </Container>
    );
}
