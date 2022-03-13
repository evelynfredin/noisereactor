import Stats from '@/Components/Admin/Stats';
import Admin from '@/Layouts/Admin';
import React from 'react';

type Props = {
  genres: App.Genre[];
};

const Genres = ({ genres }: Props) => {
  return (
    <Admin title="Genres">
      <div className="grid grid-cols-2 mx-auto w-full md:grid-cols-4 gap-3">
        {genres.map((genre) => (
          <Stats
            key={genre.id}
            count={genre.artists_count}
            label={genre.name}
          />
        ))}
      </div>
    </Admin>
  );
};

export default Genres;
