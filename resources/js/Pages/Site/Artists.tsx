import ArtistCard from '@/Components/Site/ArtistCard';
import Main from '@/Layouts/Main';
import React from 'react';

type Props = {
  artists: App.Artist[];
};

const Artists = ({ artists }: Props) => {
  console.log(artists);

  return (
    <Main title="Artists">
      <div>
        <h2>Artists</h2>
      </div>

      <section>
        {artists &&
          artists.map((artist) => (
            <ArtistCard
              slug={artist.slug}
              name={artist.name}
              albums_count={artist.albums_count}
            >
              {artist.pic !== null ? (
                <img
                  src={`/storage/${artist.pic}`}
                  alt={artist.name}
                  width="303px"
                  height="308px"
                />
              ) : (
                <img
                  src="/images/artist-default.jpg"
                  alt={artist.name}
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
