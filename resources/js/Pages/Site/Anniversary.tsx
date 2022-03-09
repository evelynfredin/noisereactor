import AlbumCard from '@/Components/Site/AlbumCard';
import Main from '@/Layouts/Main';
import { diffForHumans } from '@/utils/helpers';
import React from 'react';

type Props = {
  albumsWithBirthMonth: App.Album[];
};

const Anniversary = ({ albumsWithBirthMonth }: Props) => {
  return (
    <Main title="Release Anniversary">
      <div>
        <h2 className="font-heading text-4xl">Release Anniversary</h2>
        <p>These albums become one year older this month!</p>
      </div>

      <section className="my-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        {albumsWithBirthMonth.map((album) => (
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
    </Main>
  );
};

export default Anniversary;
