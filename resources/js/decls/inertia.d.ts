interface User {
  username: string;
}

interface SharedProps {
  user: User;
  flash: {
    success: string | null;
    error: string | null;
  };
}
