import AlbumCard from '@/Components/Site/AlbumCard';
import Main from '@/Layouts/Main';
import React from 'react';

type Props = {
  albums: App.Album[];
};

const Albums = ({ albums }: Props) => {
  return (
    <Main title="Albums">
      <div>
        <h2 className="font-heading text-4xl">Albums</h2>
      </div>

      <section className="my-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        {albums.map((album) => (
          <AlbumCard
            key={album.id}
            albumPath={album.id}
            artistName={album.artist.name}
            albumTitle={album.title}
            cover={album.cover}
            release="release date here"
          />
        ))}
      </section>
    </Main>
  );
};

export default Albums;
