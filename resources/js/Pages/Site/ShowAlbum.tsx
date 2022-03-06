import AlbumInfo from '@/Components/Site/AlbumInfo';
import Discography from '@/Components/Site/Discography';
import Main from '@/Layouts/Main';
import React from 'react';

type Props = {
  album: App.Album;
  discography: App.Album[];
};

const ShowAlbum = ({ album, discography }: Props) => {
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

      <div className="lg:max-w-5xl md:max-w-2xl mx-auto flex flex-col lg:flex-row mt-16 items-start lg:space-x-5">
        <section className="w-full lg:w-2/3 rounded-lg shadow-sm bg-white p-5 md:p-10">
          Review
        </section>
        {discography.length > 0 && (
          <aside className="mt-10 lg:mt-0 w-full lg:w-1/3 mx-auto">
            <div className="p-3 pb-8 border rounded-lg">
              <h3 className="uppercase font-bold text-lg pt-5 text-center">
                More by Artist
              </h3>
              <div className="p-3">
                {discography.map((album) => (
                  <Discography
                    key={album.id}
                    pathToAlbum={album.id}
                    albumTitle={album.title}
                  />
                ))}
              </div>
            </div>
          </aside>
        )}
      </div>
    </Main>
  );
};

export default ShowAlbum;
