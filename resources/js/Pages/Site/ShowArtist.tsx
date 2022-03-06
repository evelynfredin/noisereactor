import ArtistInfo from '@/Components/Site/ArtistInfo';
import Main from '@/Layouts/Main';
import React from 'react';

type Props = {
  artist: App.Artist;
};

const ShowArtist = ({ artist }: Props) => {
  return (
    <Main title="Artist">
      <section className="mt-5">
        <ArtistInfo
          name={artist.name}
          website={artist.website}
          pic={artist.pic}
          bio={artist.bio}
        >
          {artist.genres.length > 0 && (
            <div className="border rounded-lg mt-5 p-5">
              <h3 className="text-xl">Genres</h3>
              {artist.genres.map((genre) => (
                <p
                  key={genre.id}
                  className="bg-blue-300 inline-block px-3 py-2 rounded-3xl mt-3 mr-2 text-gray-600"
                >
                  {genre.name}
                </p>
              ))}
            </div>
          )}
        </ArtistInfo>
      </section>
    </Main>
  );
};

export default ShowArtist;
