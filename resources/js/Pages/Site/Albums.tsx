import { Pagination } from '@/Components/Global/Pagination';
import AlbumCard from '@/Components/Site/AlbumCard';
import Main from '@/Layouts/Main';
import { diffForHumans } from '@/utils/helpers';
import React from 'react';

type Props = {
  albums: Laravel.Pagination<App.Album>;
};

const Albums = ({ albums }: Props) => {
  return (
    <Main title="Albums">
      <div>
        <h2 className="font-heading text-4xl">Albums</h2>
      </div>

      <section className="my-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        {albums.data.map((album) => (
          <AlbumCard
            key={album.id}
            albumPath={album.id}
            artistName={album.artist.name}
            albumTitle={album.title}
            cover={album.cover}
            added={diffForHumans(album.created_at)}
          />
        ))}
      </section>

      <div>
        <Pagination data={albums} />
      </div>
    </Main>
  );
};

export default Albums;
