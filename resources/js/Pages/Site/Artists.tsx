import ArtistCard from '@/Components/Site/ArtistCard';
import Main from '@/Layouts/Main';
import React from 'react';

type Props = {
  artists: App.Artist[];
};

const Artists = ({ artists }: Props) => {
  return (
    <Main title="Artists">
      <div>
        <h2 className="font-heading text-4xl">Artists</h2>
      </div>

      <section className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 md:gap-5 my-10">
        {artists &&
          artists.map((artist) => (
            <ArtistCard
              key={artist.id}
              slug={artist.slug}
              name={artist.name}
              albums_count={artist.albums_count}
            >
              {artist.pic !== null ? (
                <img
                  src={`/storage/${artist.pic}`}
                  alt={artist.name}
                  className="w-full h-full sm:h-52 object-cover hover:brightness-50 contrast-100 hover:filter"
                  width="303px"
                  height="308px"
                />
              ) : (
                <img
                  src="/images/artist-default.jpg"
                  alt={artist.name}
                  className="w-full h-full sm:h-52 object-cover"
                  width="303px"
                  height="308px"
                />
              )}
            </ArtistCard>
          ))}
      </section>
    </Main>
  );
};

export default Artists;
