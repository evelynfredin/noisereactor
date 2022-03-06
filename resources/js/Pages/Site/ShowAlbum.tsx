import AlbumInfo from '@/Components/Site/AlbumInfo';
import Main from '@/Layouts/Main';
import React from 'react';

type Props = {
  album: App.Album;
};

const ShowAlbum = ({ album }: Props) => {
  console.log(album);

  return (
    <Main title="Album">
      <section>
        <AlbumInfo
          cover={album.cover}
          albumTitle={album.title}
          artistName={album.artist.name}
          description={album.description}
          pathToArtist={album.artist.slug}
          edition={album.edition}
          released={album.released_date}
          label={album.label.name}
        />
      </section>
    </Main>
  );
};

export default ShowAlbum;
