declare namespace App {
  interface Artist {
    id: number;
    name: string;
    bio: string;
    website: string;
    slug: string;
    pic: string;
    albums_count?: number;
    created_at: string;
    updated_at: string;
  }
}
