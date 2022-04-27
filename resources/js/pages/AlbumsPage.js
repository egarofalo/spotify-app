import React, { useState } from "react";
import { Container } from "react-bootstrap";
import SearchAlbums from "../components/forms/SearchAlbums";
import AlbumsList from "../components/lists/AlbumsList";
import albumsService from "./../services/albums.service";
import errorService from "./../services/error.service";

export default function () {
    const [albumsList, setAlbumsList] = useState({
        pending: false,
        data: null,
        error: null,
    });

    const [searchAlbumsForm, setSearchAlbumsForm] = useState({
        artist: "",
    });

    const handleChangeSearchAlbumsForm = (e) => {
        setSearchAlbumsForm({
            ...searchAlbumsForm,
            [e.target.name]: e.target.value,
        });
    };

    const handleSubmitSearchAlbumsForm = async (e) => {
        e.preventDefault();

        setAlbumsList({
            pending: true,
            data: null,
            error: null,
        });

        try {
            const data = await albumsService.get(searchAlbumsForm);

            setAlbumsList({
                pending: false,
                data,
                error: null,
            });
        } catch (e) {
            setAlbumsList({
                pending: false,
                data: null,
                error: errorService.getError(e),
            });
        }
    };

    return (
        <Container fluid="xl">
            <SearchAlbums
                handleChange={handleChangeSearchAlbumsForm}
                handleSubmit={handleSubmitSearchAlbumsForm}
                data={searchAlbumsForm}
                error={albumsList.error}
                pending={albumsList.pending}
            />

            <AlbumsList albumsList={albumsList} />
        </Container>
    );
}
