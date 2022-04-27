import React from "react";
import { Alert, Table, Image } from "react-bootstrap";

export default function (props) {
    const { albumsList } = props;

    const albums = _.get(albumsList, "data.albums", null);

    if (albums === null) {
        return null;
    }

    console.log(albums.items);

    return (
        <div className="albums-list-container">
            {albums.items.length === 0 ? (
                <Alert variant="warning">
                    <p className="m-0">
                        No se encontraron álbumes para el artista ingresado.
                    </p>
                </Alert>
            ) : (
                <Table striped bordered responsive variant="dark">
                    <thead>
                        <tr>
                            <th>Artista</th>
                            <th>Album</th>
                            <th>Tapa</th>
                            <th>Fecha de lanzamiento</th>
                            <th>Link</th>
                        </tr>
                    </thead>

                    <tbody>
                        {albums.items.map((album) => (
                            <tr key={album.id}>
                                <td>
                                    {album.artists.map((artist, index, arr) => (
                                        <div key={artist.id}>
                                            <a
                                                href={artist.href}
                                                target="_blank"
                                            >
                                                {artist.name}
                                            </a>

                                            {index < arr.length - 1
                                                ? " / "
                                                : ""}
                                        </div>
                                    ))}
                                </td>
                                <td>{album.name}</td>
                                <td>
                                    <Image
                                        fluid
                                        thumbnail
                                        src={album.images[1].url}
                                        alt={album.name}
                                    />
                                </td>
                                <td>
                                    {moment(album.release_date).format(
                                        "DD-MM-YYYY"
                                    )}
                                </td>
                                <td>
                                    <a
                                        href={album.external_urls.spotify}
                                        target="_blank"
                                    >
                                        Spotify
                                    </a>
                                </td>
                            </tr>
                        ))}
                    </tbody>
                </Table>
            )}
        </div>
    );
}
