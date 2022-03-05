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
        />
      </section>
    </Main>
  );
};

export default ShowArtist;
