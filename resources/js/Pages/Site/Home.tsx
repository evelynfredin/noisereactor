import AlbumCard from '@/Components/Site/AlbumCard';
import DiscographyList from '@/Components/Site/DiscographyList';
import ReviewCard from '@/Components/Site/ReviewCard';
import Main from '@/Layouts/Main';
import { diffForHumans } from '@/utils/helpers';
import { Link } from '@inertiajs/inertia-react';
import React from 'react';

type Props = {
  latestAlbums: App.Album[];
  latestReviews: App.Review[];
  albumsWithBirthMonth: App.Album[];
};

const Home = ({ latestAlbums, latestReviews, albumsWithBirthMonth }: Props) => {
  return (
    <Main title="Home">
      <section className="my-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        {latestAlbums &&
          latestAlbums.map((album) => (
            <AlbumCard
              key={album.id}
              albumPath={album.id}
              albumTitle={album.title}
              artistName={album.artist.name}
              cover={album.cover}
              added={diffForHumans(album.created_at)}
            />
          ))}
      </section>

      <section className="flex flex-col lg:flex-row my-32 justify-between items-start">
        <div className="w-full  lg:w-2/3 mb-10 lg:mr-6 rounded-lg grid grid-cols-1 md:grid-cols-2 gap-6">
          {latestReviews &&
            latestReviews.map((review) => (
              <ReviewCard
                key={review.id}
                createdAt={diffForHumans(review.created_at)}
                albumTitle={review.album.title}
                artistName={review.album.artist.name}
                excerpt={review.excerpt}
                pathToAlbum={review.album.id}
              />
            ))}
        </div>
        <div className="mt-5 lg:mt-0 w-full lg:w-1/3">
          <div className="p-3 pb-8 border rounded-lg">
            <h3 className="uppercase font-bold text-lg pt-5 text-center">
              Release anniversary
            </h3>
            <div className="p-3">
              {albumsWithBirthMonth &&
                albumsWithBirthMonth.map((album) => (
                  <DiscographyList
                    key={album.id}
                    pathToAlbum={album.id}
                    cover={album.cover}
                    albumTitle={album.title}
                  />
                ))}
            </div>
            {albumsWithBirthMonth.length >= 4 && (
              <Link
                className="flex justify-end text-sm text-gray-500 hover:text-blue-700 mt-5 px-5"
                href="/release-anniversary"
              >
                View all...
              </Link>
            )}
          </div>
        </div>
      </section>
    </Main>
  );
};

export default Home;
