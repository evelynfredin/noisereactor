import ArtistInfo from '@/Components/Site/ArtistInfo';
import DiscographyCard from '@/Components/Site/DiscographyCard';
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

      {artist.albums.length > 0 && (
        <section className="my-20">
          <h3 className="uppercase text-center md:text-left text-xl">
            Albums by {artist.name}
          </h3>
          <div className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 mt-5">
            {artist.albums.map((album) => (
              <DiscographyCard
                key={album.id}
                pathToAlbum={album.id}
                cover={album.cover}
                albumTitle={album.title}
              />
            ))}
          </div>
        </section>
      )}
    </Main>
  );
};

export default ShowArtist;
